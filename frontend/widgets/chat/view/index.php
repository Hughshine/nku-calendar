<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>

<style type="text/css">
.timeline {
    position:relative;
    margin-bottom:60px;
}
/* left */
.timeline .timeline-left .item {
    background-color: rgba(240, 240, 240, 0.3);
    border-right:rgba(240, 240, 240, 0.3) 3px solid;
    padding:10px;
    margin-left:50px;
    margin-bottom:15px;
    position:relative;
}
.timeline .timeline-left .item:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    width: 0; height: 0;
    position: absolute;
    border-right-color:rgba(191, 141, 198, 0.06);;
    border-width: 10px;
    top: 10px; left:-20px;
}
.timeline .timeline-left .item:before {
    right: 100%;
    border: #ddd 5px solid;
    content: " ";
    position: absolute;
    top: 10px; left:-50px;
    background-color:#333;
    width:22px; height:22px;
    z-index:1;

}
.timeline-left:after {
    background: #ddd;
    z-index:0;
    content: "";
    display: block;
    left: 10px;
    top:0;
    bottom:0;
    position: absolute;
    width: 4px;
    opacity: 0.35;
}
.timeline  .timeline-left .timeline-centered-title {
    float:right;
    content:' ';
    clear:both;
    font-size:19px;
}



/*tap*/
.tap-div{
    display: none;
}
.tap-div.active{
    display: block;
}

.timeline .timeline-left .item:before {
    border: #ddd 4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
}
.timeline .item p{
    margin-bottom:0px;
    margin-top:10px;
}
.timeline .timeline-left .noborder{
    border-right:none;
}
.timeline .timeline-left .item .singleline{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
}
.timeline .timeline-left .item-light:before {
    border: #dec0d8  4px solid;
    left: -46px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
}
.slideBox{
    color:#fff;
}
.slideBox p{
    margin: 20px 0px;
    text-align: left;
}
.bnlc-img{
    max-height:500px;
    max-width: 100%;
}
</style>

<div class="panel">
<?php if (!empty($data['feed'])):?>
        <?php foreach ($data['feed'] as $list):?>
            <div class="item item-light">
                <p style="margin-top:0px;">
                    <span>@<?=$list['user_name']?>: </ a><?=$list['content']?></span>
                </p>
            </div>
        <?php endforeach;?>
    <?php endif;?>
</div>
</div>




