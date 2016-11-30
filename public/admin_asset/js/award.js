var award = function () {

    this.init = function() {
        this.addEvent();
    };

    this.addEvent = function() {
        var current = this;
        $('#league_season_id').on('change', function() {
            $('#matchs').html("");
            $('#players').html("");
            current.getMatch($(this).val());
        });
        $('#matchs').on('change', '#match', function() {
            $('#players').html("");
            current.getPlayer($(this).val())
        });
    };

    this.getMatch = function(league_season_id) {
        if (league_season_id) {
            $.ajax({
                url: '/admin/player_award/matchs/' + league_season_id,
                type: 'get',
                async: false,
            })
            .done(function(data) {
                $('#matchs').html(data);
            });
        } else {
            $('#matchs').html("");
        }
    }

    this.getPlayer = function(match_id) {
        if (match_id) {
            $.ajax({
                url: '/admin/player_award/players/' + match_id,
                type: 'get',
                async: false,
            })
            .done(function(data) {
                $('#players').html(data);
            });
        } else {
            $('#players').html("");
        }
    }

    this.setMatch = function(match_id) {
        $('#match').val(match_id);
    }

    this.setPlayer = function(player_id) {
        $('#player').val(player_id);
    }
}
