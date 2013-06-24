<?php

class PassiveRecordTest extends CTestCase
{
    public function testFindAllByHash ()
    {
        $models = Model1::findAll(array('attr1' => 'x'));
        
        $this->assertTrue(count($models) === 2);
        $this->assertTrue($models[0] instanceof Model1);
        $this->assertTrue($models[1] instanceof Model1);
        
        $this->assertEquals(1, $models[0]->id);
        $this->assertEquals(2, $models[1]->id);
    }
    
    public function testFindByHash ()
    {
        $model = Model1::find(array('attr1' => 'y'));
        
        $this->assertTrue($model instanceof Model1);
        
        $this->assertEquals(3, $model->id);
        $this->assertEquals(10, $model->attr3);
    }
    
    public function testFindById ()
    {
        $model = Model1::find(3);
        
        $this->assertTrue($model instanceof Model1);
        
        $this->assertEquals(3, $model->id);
        $this->assertEquals(10, $model->attr3);
    }
}

class Model1 extends PassiveRecord
{
    public $id;
    public $attr1;
    public $attr2;
    public $attr3;
    
    public static function getData ()
    {
        return array(
            array(1,'x', 'z', 10),
            array(2,'x', 'w', 15),
            array(3,'y', 'z', 10),
            array(4,'y', 'W', 30),
        );
    }
}