<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Messages;
use App\Relationships;
use App\Article;
use App\Comment;

class ModelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'id'=>1,
            'name'=>'YAMADA-TARO',
            'mail'=>'Taro@yamada',
            'age'=>'34',
        ];
        $this->assertDatabaseHas('People',$data);
    }

    public function testCreate(){
        $data = [
            'id'=>1,
            'name'=>'DUMMY',
            'mail'=>'dummy@mail',
            'age'=>'0',
        ];
        $person = new Person();
        $person->fill($data)->save();
        $this->assertDatabaseHas('people',$data);

        $person->name = 'NOT-DUMMY';
        $person->save();
        $this->assertDatabaseMissing('people',$data);
        $data['name']='NOT-DUMMY';
        $this->assertDatabaseHas('people',$data);

        $person->delete();
        $this->assertDatabaseMissing('people',$data);

    }

    //シーダーによる固定値データの生成
    public function testSeedTest(){
        $this->seed(DatabaseSeeder::class);
        $person = Person::find(1);
        $data = $person->toArray();
        $this->assertDatabaseHas('people',$data);

        $person->delete();
        $this->assertDatabaseMissing('people',$data);

    }

    //ファクトリによるランダムデータ生成
    public function testFactoryTest(){
        for( $i=0 ; $i < 100 ; $i++ ){
            factory(Person::class)->create();
            
        }
        $count = Person::get()->count();
        $person = Person::find(rand(1,$count));
        $data = $person->toArray();
        print_r($data);

        $this->assertDatabaseHas('people',$data);

        $person->delete();
        $this->assertDatabaseMissing('people',$data);
    }

    //ステートを使ってテストする
    public function testStateTest(){
        $list = [];
        //10*4で合計40件のデータを作成
        for($i ; $i < 10 ; $i++ ){
            $p1 = factory(Person::class)->create();
            $p1 = factory(Person::class)->states('upper')->create();
            $p1 = factory(Person::class)->states('lower')->create();
            $p1 = factory(Person::class)->states('upper')
                    ->states('lower')->create();
            $list = array_merge($list , [$p1->id, $p2->id, $p3->id, $p4->id]);
        }

        for($i ; $i < 10 ; $i++ ){
            shuffle($list);
            $item = array_shift($list);
            $person = Person::find($item);
            $data = $person->toArray();
            print_r($data);

            $this->assertDatabaseHas('people',$data);

            $person->delete();
            $this->assertDatabaseMissing('people',$data);
        }

    }
}
