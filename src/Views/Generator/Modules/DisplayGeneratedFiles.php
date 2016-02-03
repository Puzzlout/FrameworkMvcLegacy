<?php
$ViewModel = new Puzzlout\Framework\ViewModels\GeneratorVm($this->app);
if (!($ControllerVm instanceof Puzzlout\Framework\ViewModels\GeneratorVm)) {
    throw new Puzzlout\Framework\Exceptions\InvalidViewModelTypeException();
} else {
    $ViewModel = clone $ControllerVm;
}
?>
<div class="top-bar">
    <a href="Index">Back</a>
</div>
<div class="content">
    <p>Files generated:</p>
    <ul>
        <?php
        foreach ($ViewModel->filesGenerated as $file) {
            echo '<li><a href="' . $file . '">' . $file . '</a></li>';
        }
        ?>
    </ul>
</div>
</body>
</html>
