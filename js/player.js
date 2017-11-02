$(document).ready(function(){
        var oQueue      = $('#queue');
        var oTable      = $('#library-table');
        var oPlayer     = $('#audio-player');
        var oSongs      = oTable.find('tr'); //Table rows.
        var songs       = [];

        var length      = oSongs.length;
        for (var i=1;i<length;i++){
                var songdata = $(oSongs[i]).children();
                //0 = Name
                //1 = Artist
                //2 = Album
                //3 = Button
                var name        = songdata[0].innerHTML;
                var artist      = songdata[1].innerHTML;
                var album       = songdata[2].innerHTML;
                var button      = $(songdata[3]);
                button          = $(button.find('button')[0]);

                songs.push([
                        name,
                        artist,
                        album,
                        button
                ]);
        }

        oQueue.empty(); //Clear queue

        var length = songs.length;
        for (var i=0;i<length;i++){
                //Set click events on all buttons with action.
                var song = songs[i];
                
                song[3].click(function(){
                        oPlayer.empty();
                        var song = $(this);

                        var jAudio      = $('<audio>');
                        var jSource     = $('<source>');
                        console.log(song.attr('x-link'));

                        jAudio.attr('controls', true);
                        jAudio.attr('autoplay', true);
                        jSource.attr('src', song.attr('x-link'));
                        jSource.attr('type', 'audio/mpeg');

                        jSource.appendTo(jAudio);
                        jAudio.appendTo(oPlayer);
                });
        }
});
