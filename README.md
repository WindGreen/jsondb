根据name获取一个对象
根据ID获取一个对象
因为json可能是嵌套的  需要指定查询的层次 默认是1层
ref属性的键是name 值是地址  地址指向真实数据
name相当于ID的别名

基本数据结构是key-value  会生成一个ID以及地址（或 ID=地址？）
[]列表 {}对象
列表是对象的集合
对象是属性的集合
属性是key-value结构

同一层的key是不可重复的，不同层次的key是可以相同的，从根出发，每个路径唯一
最外层是根（根是入口）
get(name)
set(name,value)->on(id)
value是基本类型则 插入{name:value}
value是object或json,则插入{name:{...}}
插入位置？
of(name)设置name的属性
on(id)在设置ID处的值
in(id)在设置ID列表里面元素的值
set=insert+update
递归更新与非递归更新？

db
{root:null}
p->root
db->insert(name,value)
     {root:{name:value}的kv
db->update(name,value)
db->set(name,value)
     {root:null,name:value}

{
	root:0x0001
	{
		site1:0x0002
		{
			name:'jsondb',
			domain:'www.jsondb.com',
			users:0x0003
			[
				0x0004
				{
					name:John,
					gender:male
				},
				0x0005
				{
					name:Alice,
					gender:female
				}
			],
			articles:0x0006
			[
				0x0007
				{
					title:'article1',
					author:#0x0004
				},
				0x0008
				{
					title:'article2',
					author:#0x0005
				}
			],
			customers:0x0009
			[
				0x0010:
				{
					name:Alice,
					gender:male
				},
				0x0011:
				{
					name:Bob,
					gender:male
				},
				#0x0004
			]
		}
	}
}

site1=root->get('site1');
site1->set('domain','www.jsondb.org')
echo site1->get('domaian')

article2=site1->get('articles')->get('article2');
article2->set('title','article3')
John=site1->get('users')->get('John')
article2->set('author',John)

Alice=root->find('Alice',0)	//找第一个name=alice的元素
Alices=root->findAll('Alice') //找到所有name=alice的元素
Alices=root->findAll('Alice',3)	//找到3个
Alices=root->findAll('Alice',3,5) //找到3个 偏移5个
Alices=root->findAll('Alice',3,5,true) //缓存

customer=root->find()->in('customers')		//找到customers下元素  返回的是对象
customer=root->find('customers')			//找到name=customers的元素 返回的是对象
Alice=root->find('alice')->in('customers')  //找到customers下的alice
Alices=root->findAll('alice')->in('site1')	//找到site1里所有的alice

site1=root->find('site1')->has('users','john')		//找到users包含john的site

male=root->find()->where('gender','=','male')		//找到gender=male的元素
females=root->findAll()->where('gender','=','female')		//找到gender=female的所有元素

set操作属性！！！

find() 返回元素
	第一个字符串指定name
	第一个数字指定Offset LIMIT=1
findAll() 返回列表
	第一个字符串指定name
	第一个数字指定limit
	第二个数字指定offset
	第一个布尔值指定是否缓存

		find(name,index)
		{
			return findAll(name,index,1,false)
		}

json嵌套有层级 层级有编号 查找会从大到小 不会从小到大

