const fos = () => {
	let a = $('<div id="alert-warning" class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Warning!</strong> Введите сайт в форму ниже!</div>');
	setTimeout(timeoutFunc,2000);
	$("#pop").append(a);
}

const timeoutFunc = () => {
	$("#alert-warning").remove();
}