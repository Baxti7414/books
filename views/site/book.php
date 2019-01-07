<?php

/* @var $this yii\web\View */
?>
<!---------- { position0 } ------------------------------>
<style>
    #position1{
        img{
        }
    }
    h1{
        display: block;
        font-size: 20px;
        font-family: 'ts',Verdana;
        color: #181818;
        padding-bottom: 15px;
    }
    h2{
        display: block;
        font-size: 35px;
        font-family: 'ts',Verdana;
        color: #181818;
        padding-bottom: 15px;
    }
</style>
<!---------- { position1 } ------------------------------>
<section id="position1">
    <div class="container posconent">
        <div class="col-md-4" style="">
            <img src="/<?=$book->image?>" style="height: 500px;">
        </div>
        <div class="col-md-8">
            <div class="name" style="">
                <h1>Kitob nomi: <?=$book->name?></h1><br><hr>
            </div>
            <div>
                <?foreach($book->authors as $author):?>
                    <h1>Muallif: </h1><?=$author->name?><hr>
                <?endforeach;?>
            </div>
        </div>
        <div class="col-md-4" style="">
            <h1><b>Qisqacha tar'ifi: </b><?=$book->description?> </h1><hr>

        </div>
        <div class="col-md-8" style="">
            <h1><b>Nashr yili: </b><?=$book->year?> </h1><hr>

        </div>
        <div class="col-md-8" style="">
            <h1><b>Narxi : </b><?=$book->cost?> сум</h1><hr>
        </div>
        <div class="col-md-8">
            <a class="add_tocart icon-basket"style="float: left"  title="Добавить в карзину" href="">Добавить в корзину</a>
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
<!---------- { position1 } ------------------------------>