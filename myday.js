function toggleDone(id)
{
	var toggleREQ = new Request({
		method: 'get',
		url: 'finish_task.php'
		});
	toggleREQ.send('id='+id);
}