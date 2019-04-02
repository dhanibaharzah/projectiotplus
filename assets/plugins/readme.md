# jquery.ui.timeselect

A jQuery UI library for selecting time.

## Requirements
1. [jQuery (1.6+)](http://jquery.com/)
2. [jQuery UI (1.10+)](http://jqueryui.com/)
3. [Datejs](http://www.datejs.com/)

##Options
1. **step** _(default: 30)_ : The minute increment of the select options.
2. **format** _(default: 'h:mm tt')_ : The string format of the display time (For more examples, look at the ".toString()" method of the [core.js](https://github.com/datejs/Datejs/blob/master/src/core.js) file in Datejs).
3. **maxResults** _(default: null)_ : The maximum number of results displayed, or no limit if null.
4. **autocompleteSettings** _(default: {})_ : Settings to override the [jQuery UI Autocomplete](http://api.jqueryui.com/autocomplete/) settings.

##Examples

#### Basic Example
```javascript
$('#example-1').timeselect({
    'step': 15,
    autocompleteSettings: {
        autoFocus: true
    }
});
```
    
#### Maximum Results
```javascript
$('#example-1').timeselect({
    'step': 15,
    autocompleteSettings: {
        autoFocus: true
    }
});
```
    
#### Military Time
```javascript
$('#example-1').timeselect({
    'step': 15,
    autocompleteSettings: {
        autoFocus: true
    }
});
```

To see a working example, go to [http://dochoffiday.com/_demo/jquery.ui.timeselect](http://dochoffiday.com/_demo/jquery.ui.timeselect)