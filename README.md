# Mage Wrapper
Non-static wrapper for Magento's Mage class

## Introduction

Testing is fun, but not when static classes are everywhere in your code! Use Mage Wrapper as a replacement for `Mage` static calls.

## Example

```PHP
class Foo_Bar_Model_Baz extends Mage_Core_Model_Abstract
{
    // ...
    
    
    public function getSomeProduct($id)
    {
        return $this->mage->getModel('catalog/product')->load($id);
    }
    
    // ...
}
```

## Notes

You must ensure that `$this->mage` resolves to an instance of `Mage_Wrapper` yourself. The simplest solution is to implement `_construct` and set it there:

```PHP
class Foo_Bar_Model_Baz extends Mage_Core_Model_Abstract
{
    // ...
    
    
    protected function _construct()
    {
        $this->mage = new Mage_Wrapper();
        parent::_construct();
    }
    
    // ...
}
```

However, such techniques mean that your `Mage_Wrapper` dependency cannot be mocked, so the author recommends a setter:

```PHP
class Foo_Bar_Model_Baz extends Mage_Core_Model_Abstract
{
    protected $mage;
    
    // ...
    
    protected function _construct()
    {
        $this->setMage(new Mage_Wrapper());
        parent::_construct();
    }
    
    public function setMage(Mage_Wrapper $mage)
    {
        $this->mage = $mage;
    }
    
    // ...
}
```

## Final notes

Have fun!
