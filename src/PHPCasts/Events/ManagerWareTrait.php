<?php
namespace PHPCasts\Events;

/**
 * Class ManagerWareTrait
 *
 * @property Manager $eventsManager
 */
trait ManagerWareTrait
{
    /**
     * 设置事件管理对象
     *
     * @param \PHPCasts\Events\Manager $em
     */
    public function setEventsManager($em)
    {
        $this->eventsManager = $em;
    }

    public function getEventsManager()
    {
        return $this->eventsManager;
    }

}