<?php
$d->reset();
$sql_product_danhmuc = "select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 order by stt,id desc";
$d->query($sql_product_danhmuc);
$product_danhmuc = $d->result_array();
?>
<!--Tim kiem-->
<script language="javascript">
    function doEnter2(evt) {
        var key;
        if (evt.keyCode == 13 || evt.which == 13) {
            onSearch2(evt);
        }
    }
    function onSearch2(evt) {

        var keyword2 = document.getElementById("keyword2").value;
        if (keyword2 == '' || keyword2 == '<?= _nhaptukhoatimkiem ?>...')
        {
            alert('<?= _chuanhaptukhoa ?>');
        } else {
            location.href = "tim-kiem.html&keyword=" + keyword2;
            loadPage(document.location);
        }
    }
</script>   
<!--Tim kiem-->

<link type="text/css" rel="stylesheet" href="css/jquery.mmenu.all.css" />
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript">
    $(function () {
        $('.hien_menu').click(function () {
            $('nav#menu_mobi').css({height: "auto"});
        });
        $('nav#menu_mobi').mmenu({
            extensions: ['effect-slide-menu', 'pageshadow'],
            searchfield: true,
            counters: true,
            navbar: {
                title: 'Menu'
            },
            navbars: [
                {
                    position: 'top',
                    content: ['searchfield']
                }, {
                    position: 'top',
                    content: [
                        'prev',
                        'title',
                        'close'
                    ]
                }, {
                    position: 'bottom',
                    content: [
                        '<a>Online : <?php
$count = count_online();
echo $tong_xem = $count['dangxem'];
?></a>',
                        '<a>Tổng : <?php
$count = count_online();
echo $tong_xem = $count['daxem'];
?></a>'
                    ]
                }
            ]
        });
    });
</script>

<div class="header"><a href="#menu_mobi" class="hien_menu"><i class="fa fa-bars" aria-hidden="true"></i> </a>  
</div> 
<nav id="menu_mobi" style="height:0; overflow:hidden;">
    <ul>	
        <div id="search_mobi">
            <input type="text" name="keyword2" id="keyword2" onKeyPress="doEnter2(event, 'keyword2');" value="<?= _nhaptukhoatimkiem ?>..." onclick="if (this.value == '<?= _nhaptukhoatimkiem ?>...') {
                        this.value = ''
                    }" onblur="if (this.value == '') {
                                this.value = '<?= _nhaptukhoatimkiem ?>...'}">
            <i class="fa fa-search" aria-hidden="true" onclick="onSearch2(event, 'keyword2');"></i>
        </div><!---END #search-->


        <?php for ($i = 0, $count_product_danhmuc = count($product_danhmuc); $i < $count_product_danhmuc; $i++) { ?>
            <li><a href="san-pham/<?= $product_danhmuc[$i]['tenkhongdau'] ?>-<?= $product_danhmuc[$i]['id'] ?>"><?= $product_danhmuc[$i]['ten'] ?></a>
                <ul>
                    <?php
                    $d->reset();
                    $sql_product_list = "select ten$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and id_danhmuc='" . $product_danhmuc[$i]['id'] . "' order by stt,id desc";
                    $d->query($sql_product_list);
                    $product_list = $d->result_array();
                    ?>
                    <?php for ($j = 0, $count_product_list = count($product_list); $j < $count_product_list; $j++) { ?>
                        <li><a href="san-pham/<?= $product_list[$j]['tenkhongdau'] ?>-<?= $product_list[$j]['id'] ?>/"><?= $product_list[$j]['ten'] ?></a>

                        </li>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>

    </ul>
</nav>