var team = function() {

    this.firebase = null;

    this.init = function(firebase) {
        if (typeof firebase !== 'undefined') {
            this.firebase = firebase;
        }
        this.addEvent();
    };

    this.addEvent = function() {
        var current = this;
        $('#avatar-file').on('change', function() {
            current.firebase.changeElement(current.element);
            current.firebase.uploadImage();
        });
    };

    this.element = {
        input_file: 'avatar-file',
        img_circle: '#avatar',
        progress: '.progress-bar.progress-bar-striped.active',
        input_file_logo: '#logo',
    };
};
