$(function () {
  $('.main_wrapper').load('./header.html');
  let documentHeight = Math.max(
    document.body.scrollHeight,
    document.body.offsetHeight,
    document.documentElement.clientHeight,
    document.documentElement.scrollHeight,
    document.documentElement.offsetHeight
  );
  document.querySelector('header').style.height = documentHeight + 'px';
});
