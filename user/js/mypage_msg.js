const memberModal = new bootstrap.Modal(".member_modal");

$("tbody tr").click(function (e) {
  let msgId = $(this).attr("data-msgId");
  let data = {
    msgId: msgId,
  };
  $.ajax({
    url: "msg_ok.php",
    async: false,
    type: "POST",
    data: data,
    dataType: "json",
    error: function () {
      console.log("error");
    },
    success: function (data) {
      $("#sender").text(data.result.sendername);
      $("#regdate").text("수신일 :" + data.result.regdate);
      $("#content").text(data.result.content);

      console.log(data.result);
      console.log(data.result.sendername);
      console.log(data.result.content);
      console.log(data.result.regdate);
      console.log(data.result.mid);
      console.log(data.result.msgidx);
    },
  });

  memberModal.show();
});
