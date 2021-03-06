<?php

namespace Notific\PhpSdk\Resources;

class Template extends ApiResource
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $type;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $body;

    /**
     * @var
     */
    public $url;

    /**
     * @var
     */
    public $template;

    /**
     * @var
     */
    public $createdAt;

    /**
     * @var
     */
    public $updatedAt;

    /**
     * @var array
     */
    private $data;

    /**
     * Template constructor.
     *
     * @param array $attributes
     * @param null  $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);

        $this->data = [];
    }

    /**
     * @param $recipients
     *
     * @return mixed
     */
    public function sendTo(...$recipients)
    {
        $this->data['recipients'] = $this->flatten($recipients);

        return $this->notific->sendPrivateNotification($this->id, $this->data);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->notific->sendPrivateNotification($this->id, $this->data);
    }

    /**
     * @param mixed ...$recipients
     *
     * @return mixed
     */
    public function recipients(...$recipients)
    {
        $this->data['recipients'] = $this->flatten($recipients);

        return $this->notific->sendPrivateNotification($this->id, $this->data);
    }

    /**
     * @param mixed ...$tags
     *
     * @return $this
     */
    public function tags(...$tags)
    {
        $this->data['tags'] = $this->flatten($tags);

        return $this;
    }

    /**
     * @param mixed ...$channels
     *
     * @return $this
     */
    public function channels(...$channels)
    {
        $this->data['channels'] = $this->flatten($channels);

        return $this;
    }

    /**
     * @return mixed
     */
    public function test()
    {
        return $this->notific->sendPrivateNotificationTest($this->id);
    }
}
