<nav>
    <ul class="pagination">
        <? if ($iPageActive > 4) :?>
            <li><a href="/page/1" aria-label="First">1</a></li>
        <?endif;?>
        <? if ($iPageActive > 5) :?>
            <li class="disabled"><a>...</a></li>
        <?endif;?>
        <?for ($i=-3;$i<=3;$i++):?>
            <?if ((($iPageActive+$i) > 0) && (($iPageActive+$i) <= $iPagesCount)):?>
                <?if ($i !== 0):?>
                    <li><a href="/page/<?=$iPageActive+$i?>"><?=$iPageActive+$i?></a></li>
                <?else:?>
                    <li class="active"><a><?=$iPageActive+$i?></a></li>
                <?endif;?>
            <?endif;?>
        <?endfor;?>
        <? if ($iPageActive < ($iPagesCount-4)) :?>
            <li class="disabled"><a>...</a></li>
        <?endif;?>
        <? if ($iPageActive < ($iPagesCount-3)) :?>
            <li><a href="/page/<?=$iPagesCount?>" aria-label="Last"><?=$iPagesCount?></a></li>
        <?endif;?>
    </ul>
</nav>