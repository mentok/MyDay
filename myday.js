function toggleDone(id)
{
	var toggleREQ = new Request({
		method: 'get',
		url: 'finish_task.php',
		onSuccess: function(resp)
		{
			$('t'+id).toggleClass('finished');
			if($('t'+id).hasClass('finished'))
			{
				$('ti'+id).set('src', 'tick_finished.png');
			}
			else
			{
				$('ti'+id).set('src', 'tick.png');
			}
		}
		});
	toggleREQ.send('id='+id);
}