<?php

namespace Aeria\Kernel\Tasks;

use Aeria\Kernel\AbstractClasses\Task;
use Aeria\Kernel\Loader;

/**
 * This task is in charge of creating renderers.
 *
 * @category Kernel
 *
 * @author   Simone Montali <simone.montali@caffeina.com>
 * @license  https://github.com/caffeinalab/aeria/blob/master/LICENSE  MIT license
 *
 * @see     https://github.com/caffeinalab/aeria
 */
class CreateRenderer extends Task
{
    public $priority = 1;
    public $admin_only = false;

    /**
     * The main task method. It loads the views from the files.
     *
     * @param array $args the arguments to be passed to the Task
     *
     * @since  Method available since Release 3.0.0
     */
    public function do(array $args)
    {
        foreach ($args['service']['render_engine']->getRootPaths() as $root_path) {
            Loader::loadViews($root_path, $args['service']['render_engine']);
        }
    }
}
