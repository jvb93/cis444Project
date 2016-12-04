$(document).ready(function(){

  if($('#php_sess').val() == 1)
  {
    $('.upVote').click(function(){
      var id = $(this).attr('data-id');
      console.log('upvote ' + id);

      var voteArea = $(this).closest('.voteArea');
      var voteAreaScore = $(voteArea).find('.score');
      var thisUpVoteButton = $(voteArea).find('.upVote');
      var thisDownVoteButton = $(voteArea).find('.downVote');

      if(!voteAreaScore.hasClass('text-success'))
      {
        voteAreaScore.removeClass('text-success');
        voteAreaScore.removeClass('text-danger');
        voteAreaScore.addClass('text-success');
        thisUpVoteButton.removeClass('text-success');
        thisDownVoteButton.removeClass('text-danger');
        thisUpVoteButton.addClass('text-success');
        voteAreaScore.text(parseFloat(voteAreaScore.text())+1);

        var ajaxURL = 'upVote.php?id='+id;

        console.log(ajaxURL);
        $.ajax({
          url: ajaxURL,
          method: 'GET'
        });
      }
    });

    $('.downVote').click(function(){
      var id = $(this).attr('data-id');
      console.log('downvote ' + id);

      var voteArea = $(this).closest('.voteArea');
      var voteAreaScore = $(voteArea).find('.score');
      var thisUpVoteButton = $(voteArea).find('.upVote');
      var thisDownVoteButton = $(voteArea).find('.downVote');

      if(!voteAreaScore.hasClass('text-danger'))
      {
        voteAreaScore.removeClass('text-success');
        voteAreaScore.removeClass('text-danger');
        voteAreaScore.addClass('text-danger');
        thisUpVoteButton.removeClass('text-success');
        thisDownVoteButton.removeClass('text-danger');
        thisDownVoteButton.addClass('text-danger');
        voteAreaScore.text(parseFloat(voteAreaScore.text())-1);

        var ajaxURL = 'downVote.php?id='+id;
        console.log(ajaxURL);
        $.ajax({
          url: ajaxURL,
          method: 'GET'
        });
      }


    });
  }

  else {
    $('.voteLink').each(function() {
        $(this).attr('href', 'login.php');
    });
  }



});
