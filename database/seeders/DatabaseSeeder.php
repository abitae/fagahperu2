<?php

namespace Database\Seeders;

use App\Models\ActionNegocio;
use App\Models\AcuerdoMarco;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CodeExit;
use App\Models\Contact;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Inventory;
use App\Models\InventoryEntry;
use App\Models\InventoryExit;
use App\Models\Line;
use App\Models\Negocio;
use App\Models\ProductStore;
use App\Models\Store;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Abel Arana',
            'email' => 'abel.arana@hotmail.com',
            'isActive' => true,
            'password' => bcrypt('lobomalo123'),
        ]);

        $role = Role::create(['name' => 'Admin']);
        $arrayOfPermissionNames = [];
        array_push($arrayOfPermissionNames,
            'Crear usuario',
            'Ver usuario',
            'Editar usuario',
            'Eliminar usuario'
        );
        array_push($arrayOfPermissionNames,
            'Crear rol',
            'Ver rol',
            'Editar rol',
            'Eliminar rol'
        );
        //CM permisos
        array_push($arrayOfPermissionNames,
            'CM Import',
        );
        array_push($arrayOfPermissionNames,
            'CM Data',
        );
        array_push($arrayOfPermissionNames,
            'Crear acuerdo',
            'Ver acuerdo',
            'Editar acuerdo',
            'Eliminar acuerdo'
        );
        //CM end
        //CRM permisos
        array_push($arrayOfPermissionNames,
            'Crear negocio',
            'Ver negocio',
            'Editar negocio',
            'Eliminar negocio'
        );
        array_push($arrayOfPermissionNames,
            'Crear cliente',
            'Ver cliente',
            'Editar cliente',
            'Eliminar cliente'
        );
        array_push($arrayOfPermissionNames,
            'Crear contacto',
            'Ver contacto',
            'Editar contacto',
            'Eliminar contacto'
        );
        //CRM end
        //Almacenar permisos
        array_push($arrayOfPermissionNames,
            'Crear producto',
            'Ver producto',
            'Editar producto',
            'Eliminar producto'
        );
        array_push($arrayOfPermissionNames,
            'Crear marca',
            'Ver marca',
            'Editar marca',
            'Eliminar marca'
        );
        array_push($arrayOfPermissionNames,
            'Crear categoria',
            'Ver categoria',
            'Editar categoria',
            'Eliminar categoria'
        );
        array_push($arrayOfPermissionNames,
            'Crear linea',
            'Ver linea',
            'Editar linea',
            'Eliminar linea'
        );
        //Almacen end
        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());
        $role->syncPermissions(Permission::all());
        $user->assignRole($role);

        $role = Role::create(['name' => 'User']);
        /* User::factory(99)->create()->each(function ($user) {
            $user->assignRole('User');
        }); */
        /* Customer::factory(100)->create();
        Employee::factory(10)->create();
        Supplier::factory(10)->create();
        Contact::factory(100)->create();
        Negocio::factory(100)->create();
        ActionNegocio::factory(1000)->create(); */
        //Brand::factory(10)->create();
        //Category::factory(10)->create();
        //Line::factory(10)->create();
        /* $sql1 = database_path(path: 'data/categoria.sql');
        DB::unprepared(file_get_contents($sql1));

        $sql2 = database_path(path: 'data/marca.sql');
        DB::unprepared(file_get_contents($sql2));

        $sql3 = database_path(path: 'data/line.sql');
        DB::unprepared(file_get_contents($sql3));

        $sql4 = database_path(path: 'data/productos.sql');
        DB::unprepared(file_get_contents($sql4));
        $sql5 = database_path(path: 'data/productos2.sql');
        DB::unprepared(file_get_contents($sql5)); */

        /* AcuerdoMarco::create([
            'code' => 'EXT-CE-2022-5',
            'name' => 'EXT-CE-2022-5 COMPUTADORAS DE ESCRITORIO, COMPUTADORAS PORTÁTILES Y ESCÁNERES',
            'isActive' => true,
        ]);
        AcuerdoMarco::create([
            'code' => 'EXT-CE-2021-6',
            'name' => 'EXT-CE-2021-6 IMPRESORAS, CONSUMIBLES, REPUESTOS Y ACCESORIOS DE OFICINA',
            'isActive' => true,
        ]);
        AcuerdoMarco::create([
            'code' => 'EXT-CE-2021-7',
            'name' => 'EXT-CE-2021-7 ÚTILES DE ESCRITORIO, PAPELES Y CARTONES',
            'isActive' => true,
        ]);
        ProductStore::factory(30)->create();
        Warehouse::factory(3)->create();
        Inventory::factory(200)->create();
        InventoryEntry::factory(1000)->create();
        InventoryExit::factory(1000)->create();
        CodeExit::factory(100)->create(); */
    }
}
