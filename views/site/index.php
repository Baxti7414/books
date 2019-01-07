<?php

/* @var $this yii\web\View */
use app\models\Books;
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Bosh sahifa';
$books = Books::find()->all();
?>

<!---------- { position0 } ------------------------------>
<section id="position0">
    <div class="bnd1 ">
        <a href=""><img class="omg1" style="width:100%!important;" src="/images/01.jpg" /></a>
        <!--a href=""><img class="omg2" src="images/5.jpg" /></a>
        <a href=""><img class="omg3" src="images/4.jpg" /></a-->
        <div class="clear"></div>
    </div>

<!--    <div class="statpanel">
        <div class="container">
            <span class="icon-clock-1">Доставим от 2 дней</span>
            <span class="icon-back-in-time">15 дней на возврат</span>
            <span class="icon-vcard">Официальная гарантия</span>
            <a href="">Batafsil</a>
            <div class="clear"></div>
        </div>
    </div>-->
    <div class="clear"></div>
</section>
<!---------- { position0 } ------------------------------>

<!---------- { position1 } ------------------------------>
<section id="position1">
    <div class="colontit1">
        <div class="container">
            <div class="colt1 icon-th-large-outline"></div>
            <div class="colt2">Ommabop</div>
            <div class="colt3"><a href="">Barchasini ko'rish</a></div>
        </div>
    </div>
    <div class="clear"></div>

    <div class="container posconent">
        <div id="slidera1" >
            <!---------------------------------->
            <?foreach($books as $book):?>
            <div class="slidera22">
                <div class="slide_p4">
                    <div class="posgend">
                        <a href="site/book/?id=<?=$book['id']?>" class="linkpostger">
                            <img class="imgspostg" src="/<?=$book->image?>" style="width: 140px" />
                            <div class="textpostg"><?=$book->name?></div>
                        </a>
                        <div class="mon1pos"><div class="monpostg"><?=$book->cost?> sum</div></div>
                        <div class="autors">
                            <?foreach($book->authors as $author):?>
                            <?=$author->name?>
                            <?endforeach;?>
                            </div>
                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                        <a class="add_to_cart" title="Добавить в карзину" href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $book->id])?>" data-id="<?= $book->id?>">Savatcha</a>
                    </div>
                </div>
            </div>
            <?endforeach;?>
            <!---------------------------------->
        </div>

    </div>
    <div class="elements"></div>



    <div class="container posconent">
        <div id="slidera2">
            <?foreach($books as $book):?>
            <!---------------------------------->
            <div class="slidera22">
                <div class="slide_p4">
                    <div class="posgend">
                        <a href="" class="linkpostger">
                            <img class="imgspostg" src="/<?=$book->image?>" style="width: 140px" />
                            <div class="textpostg"><?=$book->name?></div>
                        </a>
                        <div class="mon1pos"><div class="monpostg"><?=$book->cost?> sum</div></div>
                        <div class="autors">J. S. Cooper</div>
                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                        <a class="add_tocart icon-basket" title="Добавить в карзину" href="">Savatcha</a>
                    </div>
                </div>
            </div>
            <!---------------------------------->
            <?endforeach;?>


            
        </div>
    </div>
    </div>
</section>
<!---------- { position1 } ------------------------------>

<!---------- { position2 } ------------------------------>
<!--<section id="position2">
    <div class="colontit2">
        <div class="container">
            <div class="colt1 icon-th-large-outline"></div>
            <div class="colt2">Новости</div>
            <div class="colt3"><a href="">Посмотреть все</a></div>
        </div>
    </div>

    <div class="container posnews">
        <a href="" class="bkpos_31 posnegs wow fadeIn">
            <div class="imnee" style="background: url(images/2.jpg) no-repeat;"></div>
            <div class="textee">
                <h1>All students</h1>
                <p>Many students are cash-strapped, nowadays.
                    Nevertheless, their purchasing power is very
                    high. Research reveals that 20 m...</p>
            </div>
        </a>

        <a href="" class="bkpos_31 posnegs wow fadeIn">
            <div class="imnee" style="background: url(images/73186.jpg) no-repeat;"></div>
            <div class="textee">
                <h1>All students</h1>
                <p>Many students are cash-strapped, nowadays.
                    Nevertheless, their purchasing power is very
                    high. Research reveals that 20 m...</p>
            </div>
        </a>

        <a href="" class="bkpos_31 posnegs wow fadeIn">
            <div class="imnee" style="background: url(images/camp-2587926_1920.jpg) no-repeat;"></div>
            <div class="textee">
                <h1>All students Many students are cash-strapped, nowadays.
                    Nevertheless, their purchasing power is very
                    high. Research reveals that 20 m...</h1>
                <p>Many students are cash-strapped, nowadays.
                    Nevertheless, their purchasing power is very
                    high. Research reveals that 20 m... Many students are cash-strapped, nowadays.
                    Nevertheless, their purchasing power is very
                    high. Research reveals that 20 m...</p>
            </div>
        </a>
    </div>
</section>-->
<!---------- { position2 } ------------------------------>


<!---------- { position1 } ------------------------------>
<section id="position1">
    <div class="colontit1">
        <div class="container">
            <div class="colt1 icon-th-large-outline"></div>
            <div class="colt2">Tavsiya etamiz</div>
            <div class="colt3"><a href="">Barchasini ko'rish</a></div>
        </div>
    </div>

    <div class="container posconent">
        <div id="slidera3" >
            <?foreach($books as $book):?>
            <!---------------------------------->
            <div class="slidera22">
                <div class="slide_p4">
                    <div class="posgend">
                        <a href="" class="linkpostger">
                            <img class="imgspostg" src="/<?=$book->image?>" style="width: 140px" />
                            <div class="textpostg"><?=$book->name?></div>
                        </a>
                        <div class="mon1pos"><div class="monpostg"><?=$book->cost?> sum</div></div>
                        <div class="autors">J. S. Cooper</div>
                        <div class="rating">
                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                        </div>
                        <a class="add_tocart icon-basket" title="Добавить в карзину" href="">Savatcha</a>
                    </div>
                </div>
            </div>
            <!---------------------------------->
            <?endforeach;?>


            
        </div>
    </div>
</section>
<!---------- { position1 } ------------------------------>