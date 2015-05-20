<div class="item_box">
	<img src="/assets/img/upload/<?= $item->img_path; ?>" width="400">
	<table>
		<tr>
			<th>商品名</th>
			<td><?= $item->name; ?></td>
		</tr>
		<tr>
			<th>在庫</th>
			<td><?= $item->stock; ?></td>
		</tr>
		<tr>
			<th>値段</th>
			<td>\<?= number_format($item->price); ?></td>
		</tr>
	</table>
	<p>
		<?= nl2br($item->detail); ?>
	</p>
	<button class="big-button" id="cart_button" onclick="cart(<?= $item->id; ?>)">カートに入れる！</button>
</div>
<?= Asset::js("jquery.min.js"); ?>
<?= Asset::js("jquery.cookie.js"); ?>
<script>
	function cart(id){
		var cartString = $.cookie("cart");
		if(cartString == undefined){
			var items = new Array();
		}else{
			var items = cartString.split(",");
		}
		items.push(id.toString());
		items = $.unique(items);
		$.cookie("cart", items.join(","), { path: "/" });
		$("#cart_button").text("カートに入っています");
		$("#cart_button").prop("disabled", true);
	}

	$(document).ready(function(){

		var cartString = $.cookie("cart");
		if(cartString == undefined){
		}else{
			var items = cartString.split(",");
			if($.inArray("<?= $item->id; ?>", items) != -1){
				$("#cart_button").text("カートに入っています");
				$("#cart_button").prop("disabled", true);
			}
		}
	});

</script>