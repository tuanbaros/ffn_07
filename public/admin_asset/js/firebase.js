var firebaseCustom = function() {
    this.config = {
        apiKey: null,
        authDomain: null,
        databaseURL: null,
        storageBucket: null,
        messagingSenderId: null,
    };

    this.metadata = {
        contentType: 'image/jpeg',
    };

    this.element = {
        id_avatar_file: null,
        id_img_circle: null,
        id_progress: null,
        id_input_logo: null,
    };

    this.init = function(config) {
        if (typeof config !== 'undefined') {
            this.changeConfig(config);
            console.log(this.config);
            firebase.initializeApp(this.config);
        }
    };

    this.changeElement = function(element) {
        for (var p_key in this.element) {
            this.element[p_key] = element[p_key];
        }
    };

    this.changeConfig = function(config) {
        for (var p_key in this.config) {
            this.config[p_key] = config[p_key];
        }
    };
}
