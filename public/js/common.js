$(function () {
  $("#cart-btn").click(function () {
    var item_id = $("#item_id").val();
    location.href = 'http://localhost:8000/cart/in/' + item_id;
  });
});