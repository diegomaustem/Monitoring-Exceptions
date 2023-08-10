<?php 

class ExceptionHandler implements \SplSubject {
    
    protected \SplObjectStorage $observers;
    protected ?\Throwable $throwable = null;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage;
    }

    public function attach(\SplObserver $observer): void 
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void 
    {
        $this->observers->detach($observer);
    }

    public function notify(): void {
        foreach($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function handle(Throwable $t) 
    {
        $this->throwable = $t;
        $this->notify();
    }

    public function getMessage(): ?string
    {
        if($this->throwable) {
            return $this->throwable->getMessage();
        }
        return null;
    }

    public function getType(): ?string 
    {
        if($this->throwable) {
            return get_class($this->throwable);
        }
        return null;
    }
}