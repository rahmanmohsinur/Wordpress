<div class="col-sm-4 col-sm-offset-1 blog-sidebar">
    <aside>
        <?php if (is_active_sidebar('sidebar1')) : ?>
           <?php dynamic_sidebar(sidebar1) ?>
        <?php endif ?>
        <?php if (is_active_sidebar('sidebar2')) : ?>
           <?php dynamic_sidebar(sidebar2) ?>
        <?php endif ?>
        <?php if (is_active_sidebar('sidebar3')) : ?>
           <?php dynamic_sidebar(sidebar3) ?>
        <?php endif ?>
        <div class="sidebar-module sidebar-module-inset">
          <h4 class="widget-title">সাইট ইউজার লগইন</h4>
          <ol class="user-form inner-border">
            <li><?php wp_loginout($_SERVER['REQUEST_URI'], true); ?></li>
            <li><?php wp_register('', ''); ?></li>
          </ol>
        </div>
    </aside>
</div><!--/blog-sidebar-->