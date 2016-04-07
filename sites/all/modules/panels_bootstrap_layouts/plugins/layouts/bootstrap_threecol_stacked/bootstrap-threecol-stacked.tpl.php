<div class="<?php print $classes ?>" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <?php if ($content['top']): ?>
    <div class="row">
      <?php print $content['top']; ?>
    </div>
  <?php endif ?>

  <?php if ($content['left'] || $content['middle'] || $content['right']): ?>
    <div class="row"> <!-- @TODO: Add extra classes -->
      <?php print $content['left']; ?>
      <?php print $content['middle']; ?>
      <?php print $content['right']; ?>
    </div>
  <?php endif ?>

  <?php if ($content['left2'] || $content['right2']): ?>
    <div class="row"> <!-- @TODO: Add extra classes -->
      <?php print $content['left']; ?>
      <?php print $content['right']; ?>
    </div>
  <?php endif ?>

  <?php if ($content['bottom']): ?>
    <div class="row">
      <?php print $content['bottom']; ?>
    </div>
  <?php endif ?>
</div>
