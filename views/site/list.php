
<section id="position1">
    <div class="container posconent">
        <div class="slidera2">
                    <?foreach($books as $book):?>
                    <div class="slidera22">
                        <div class="col-md-2" style="">
                            <div class="posgend">
                                <a href="/site/book/?id=<?=$book['id']?>" class="linkpostger">
                                    <img class="imgspostg" src="/<?=$book->image?>" />
                                    <div class="textpostg"><?=$book->name?></div>
                                </a>
                            </div>
                            <div class="mon1pos"><div class="monpostg"><?=$book->cost?> sum</div>
                            <div class="autors">J. S. Cooper</div>
                            <div class="rating">
                                <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                            </div>
                                <a class="add_tocart icon-basket" title="Добавить в карзину" href="">Корзина</a><br><br><br>
                        </div>
                    </div>
                    <?endforeach;?>
        </div>
    </div>
</section>