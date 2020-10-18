	$("ul > li").hover(
		function () {
			$(this).addClass('active');
		},
		function () {
			$(this).removeClass('active');
		}
	);
$("ul > li").click(function () {
	$(this).toggleClass('active');
});