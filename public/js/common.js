$(function () {
  $("#cart-btn").click(function () {
    var item_id = $("#item_id").val();
    location.href = 'http://localhost:8000/cart/in/' + item_id;
  });
});

$(function () {
  // 郵便番号からの住所検索
  $('#address_search').click(function () {

    let zip = $('#zip').val();

    let entry_url = $('#entry_url').val();

    if (zip.match(/[0-9]{7}/) === null) {
      alert('正確な郵便番号を入力してください');
      return false;
    } else {
      $.ajax({
        type: "get",
        url: entry_url + "/postcode_search.php?zip=" + escape(zip),
      }).then(
        function (data) {
          if (data == 'no' || data == '') {
            alert('該当する郵便番号がありません');
          } else {
            $('#address').val(data);
          }
        },
        function (data) {
          alert('読み込みに失敗しました');
        },
      );
    }
  });
});

$(function () {
  // いいねボタン実装
  $('.btn-like').on('click', function () {
    let item_id = $(this).data('item-id');
    let button = this;

    console.log(item_id);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'POST',
      url: 'http://localhost:8000/like',
      data: { item_id: item_id }
    }).then(
      function (data) {
        console.log('ajax success');

        $(button).find('span').html(data);
        $(button).children('i').toggleClass('far');
        $(button).children('i').toggleClass('fas');
        $(button).children('i').toggleClass('red');
      },
      function (data) {
        console.log('ajax error');
        $(button).children('span').html(data);
        // location.href = 'http://localhost:8000/login';
      },
    );
  });
});
