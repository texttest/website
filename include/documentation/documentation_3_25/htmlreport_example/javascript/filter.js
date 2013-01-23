
// A test result category.
// - Containts its color and view state
var Category = function(color)
{
    this.color = color;
    this.isVisible = true;
};
// Test if a 'test result' is of this category
Category.prototype.appliesTo = function(testElem)
{
    return testElem.bgColor.toUpperCase() == this.color;
};

// Represent a row with test results
// - Contains reference to 'tr' object and last 'td' object (todays result)
var TestRow = function(trElem)
{
    var tdList = trElem.getElementsByTagName('td');
    this.lastCol = tdList[tdList.length-1];
    this.row = trElem;
    this.testName = $(tdList[0]).text().replace(/\n/g,"");
};

var isTestRow = function(trElem)
{
    var tdList = trElem.getElementsByTagName('td');
    return (tdList.length > 0) 
       && tdList[0].bgColor.toUpperCase() == TEST_ROW_HEADER_COLOR;
}	

// The 'manager' class
var Filter = function(bodyElem)
{
    var rowList = bodyElem.getElementsByTagName('tr');
    this.testRows = [];
    for (var i = 0; i < rowList.length; ++i)
	if (isTestRow(rowList[i]))
	    this.testRows.push(new TestRow(rowList[i]));
	
    this.categories = [];
    for (var i = 0; i < Colors.length; ++i)
        this.categories.push(new Category(Colors[i]));

    this.numTestsVisible = -1;   // initiated on apply()
    this.textFilter = null;      
    this.onUpdateCallbacks = []; 
};

// Hide/Show a single row
Filter.prototype.setRowVisibility = function(testRow, textFilterRegExp)
{
    var visible = true;
    for (var i = 0; i < this.categories.length; ++i)
    {
	var cat = this.categories[i];
	if (cat.appliesTo(testRow.lastCol))
	{
	    visible = cat.isVisible;
	    break;
	}
    }

    // Respect text filter
    if (visible)
    {
	var testName = testRow.testName.toLowerCase();
	visible = testName.search(textFilterRegExp) > -1;
    }
    testRow.row.style.display = visible ? "" : "None";
    return visible;
};

Filter.prototype.onUpdate = function(callback) 
{
    this.onUpdateCallbacks.push(callback);
};

Filter.prototype.fireOnUpdate = function()
{
    for (var i = 0; i < this.onUpdateCallbacks.length; ++i)
        this.onUpdateCallbacks[i]();
};

// Apply the filter (hide/show rows)
Filter.prototype.apply = function()
{
    var textFilterString = "";

    // Compute regular expression
    try {
	textFilterString = new RegExp(this.textFilter.val().toLowerCase());
	this.textFilter.css('color','black');
    } catch (err) {
	this.textFilter.css('color','red'); // set regexp string color to red on error
    }

    this.numTestsVisible = 0;
    for (var i = 0; i < this.testRows.length; i++)
	if (this.setRowVisibility(this.testRows[i], textFilterString))
	    this.numTestsVisible++;

    this.fireOnUpdate();
};

Filter.prototype.showOnly = function(category)
{
    for (var i = 0; i < this.categories.length; ++i)
    {
	this.categories[i].isVisible = false;
    }
    category.isVisible = true;
    this.apply();
}

Filter.prototype.toggle = function(category)
{
    category.isVisible = !category.isVisible;
    this.apply();
}

Filter.prototype.reset = function()
{
    this.textFilter[0].value = "";
    for (var i = 0; i < this.categories.length; ++i)
    {
        this.categories[i].isVisible = true;
    }
    this.apply();
};

// Create html and behavior of a category toggler
var createCategoryToggler = function(filter, category, id)
{
    var toggler = $('<div title="Toggle this category" id=color' + id + '></div>');
    toggler.css({
            'position' : 'relative',
	    'background-color': category.color,
	    'width': '80px',
	    'height': category.isVisible ? '100%' : '30%'
	    });
    toggler.mousedown(function(event) {	
	    if (event.ctrlKey)
		filter.showOnly(category);
	    else
		filter.toggle(category);
	    });
    filter.onUpdate(function() { 
	    toggler.animate({'height': category.isVisible?'100%':'30%'}, 250);
	});
    return toggler;
};

// Create text filter, filters on test names
var createTextFilter = function(filter)
{
    var textFilter = $('<input id="textfilter" title="Test name filter" type="text"></input>');
    var timerId = null;
    textFilter.keyup(function() { 
	    if (timerId)
		clearTimeout(timerId);
            timerId = setTimeout(function() { filter.apply(); }, 250);
	});
    return textFilter;
}

// Initialize
var init = function()
{
    // Create html and behavior of toolbar
    // containing category togglers
    var toolbarContent = $("<div id=colorbar></div>");
    toolbarContent.css({
	    'top': '0px',
	    'left': '0px',
            'width': '100%',
            'position': 'fixed',
	    'padding': '5px',
	    'background-color': '#222222',
            'opacity': '0.1'
	    });
    toolbarContent.hover(function() { $(this).stop().fadeTo('fast',0.9); }, 
			 function() { $(this).stop().fadeTo('fast',0.1); });

    var layoutTable = $("<table></table>");
    var layoutRow = $("<tr></tr>");
    layoutTable.append(layoutRow);
		
    // The filter instance
    var filter = new Filter(document.body);

    // Populate toolbar with category togglers
    for (var i = 0; i < filter.categories.length; ++i)
    {
	var cat = filter.categories[i];
	var td = $("<td height=30></td>").mousedown(function(event) {event.preventDefault();});
	td.append(createCategoryToggler(filter, cat, i+1));
	layoutRow.append(td);
    }

    // Append text filter
    var indentedTd = $('<td height=32 style="padding-left:20px"></td>');
    var textFilter = createTextFilter(filter);
    filter.textFilter = textFilter;
    layoutRow.append(indentedTd.clone().append(textFilter));

    var whiteText = {'color': 'white', 'font-size': '12px'};
    // Append status
    var status = $('<div id="status"></div>').css(whiteText);
    layoutRow.append(indentedTd.clone().append(status));
    filter.onUpdate(function() 
    {
	$("#status").html(filter.numTestsVisible + " tests selected");
    });

    // Append reset link
    var reset = $('<div id="reset" title="Reset all filters">Reset</div>').css(whiteText)
    reset.css('cursor','pointer');
    reset.hover(function() {$(this).css('text-decoration','underline');}, 
		function() {$(this).css('text-decoration','none');});
    reset.mousedown(function(){filter.reset();});
    layoutRow.append(indentedTd.clone().append(reset));

    // Insert toolbar
    toolbarContent.append(layoutTable);
    $(document.body).append(toolbarContent);

    filter.apply();
};

// Run initialization function when document is loaded
$(document).ready(init);

