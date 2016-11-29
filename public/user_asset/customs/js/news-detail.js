var news_detail = function() {

    this.data = {
        user_id: null,
        content: null,
        news_id: null,
        name: null,
        avatar: null,
        '_token': $('meta[name="_token"]').attr('content'),
    };

    this.init = function(data) {
        this.data.user_id = data.user_id;
        this.data.news_id = data.news_id;
        this.data.name = data.name;
        this.data.avatar = data.avatar;
        this.addEvent();
    };

    this.addEvent = function() {
        var current = this;
        $('img').addClass('img-responsive slide-icon');
        $('#btn-comment').on('click', function() {
            var content = $('#content-comment').val();
            if (current.data.name == null) {
                swal('Sign In?', 'Not sign in?', 'question');
                return;
            }
            if (content.length > 0) {
                current.data.content = content;
                $.ajax({
                    url: '/news/comments',
                    type: 'POST',
                    data: current.data,
                })
                .done(function(data) {
                    console.log("success");
                    if (data.result == 'error') {
                        swal('Error', 'error', 'error');
                    } else {
                        $('.comment.comment-content').prepend(" <div  class='media'> "
                            + " <a class='pull-left' href='javascript:void(0)'> "
                            + " <img class='media-object img-circle img-responsive slide-icon' "
                            + " src='" + current.data.avatar + "'> "
                            + " </a> "
                            + " <div class='media-body'> "
                            + " <h4 class='media-heading'> " + current.data.name 
                            + " <small> " + new Date() + " </small> "
                            + " </h4> "
                            + content
                            + " </div> "
                            + " </div> "
                        );
                    }       
                })
                .fail(function() {
                    swal('Error', 'error', 'error');
                });
                $('#content-comment').val('');
            } else {
                swal('Comment empty', 'comment empty', 'Comment empty');
            }
        });
    };
};
