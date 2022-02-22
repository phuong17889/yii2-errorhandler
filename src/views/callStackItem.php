<?php
/* @var $file string|null */
/* @var $line int|null */
/* @var $class string|null */
/* @var $method string|null */
/* @var $index int */
/* @var $lines string[] */
/* @var $begin int */
/* @var $end int */
/* @var $args array */
/* @var $handler ErrorHandler */

use phuong17889\errorhandler\ErrorHandler;

$html = <<<HTML
IDE
<svg class="icon icon--new-window" focusable="false" aria-hidden="true" width="16" height="16">
    <use href="#new-window"></use>
</svg>
HTML;
?>
<li class="<?= ($index === 1 || !$handler->isCoreFile($file)) ? 'application' : '' ?> call-stack-item"
    data-line="<?= (int) ($line - $begin) ?>">
	<div class="element-wrap">
		<div class="element">
			<span class="item-number"><?= (int) $index ?>.</span>
			<span class="text"><?= $file !== null ? 'in ' . $handler->htmlEncode($file) : '' ?></span>
			<?php if ($handler->traceLine !== '{html}'): ?>
				<span> &ndash; </span>
				<?= strtr($handler->traceLine, ['{file}' => $file, '{line}' => $line + 1, '{html}' => $html]) ?>
			<?php endif; ?>
			<span class="at">
                <?= $line !== null ? 'at line' : '' ?>
                <a href="phpstorm://open?url=file://<?= $file ?>&line=<?= $line + 1 ?>"><span class="line"><?= $line !== null ? $line + 1 : '' ?></span></a>
            </span>
			<?php if ($method !== null): ?>
				<span class="call">
                    <?= $file !== null ? '&ndash;' : '' ?>
                    <?= ($class !== null ? $handler->addTypeLinks("$class::$method") : $handler->htmlEncode($method)) . '(' . $handler->argumentsToString($args) . ')' ?>
                </span>
			<?php endif; ?>
		</div>
	</div>
	<?php if (!empty($lines)): ?>
		<div class="code-wrap">
			<div class="error-line"></div>
			<?php for ($i = $begin; $i <= $end; ++$i): ?><div class="hover-line"></div><?php endfor; ?>
			<div class="code">
				<?php for ($i = $begin; $i <= $end; ++$i): ?><a href="phpstorm://open?url=file://<?= $file ?>&line=<?= (int) ($i + 1) ?>"><span class="lines-item"><?= (int) ($i + 1) ?></span></a><?php endfor; ?>
				<pre><?php
					// fill empty lines with a whitespace to avoid rendering problems in opera
					for ($i = $begin; $i <= $end; ++$i) {
						echo (trim($lines[$i]) === '') ? " \n" : $handler->htmlEncode($lines[$i]);
					}
					?></pre>
			</div>
		</div>
	<?php endif; ?>
</li>
