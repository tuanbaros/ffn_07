var home = function() {
    
    this.init = function() {
        this.addEvent();
    };

    this.addEvent = function() {
        $("abbr.timeago").timeago();
    };
}

var h = new home();
h.init();
