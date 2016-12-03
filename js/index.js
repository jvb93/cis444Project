$(document).ready(function(){
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
      $.ajax({
        url: 'voteUp.php?id='+id,
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

      $.ajax({
        url: 'voteDown.php?id='+id,
        method: 'GET'
      });
    }


  });


});
