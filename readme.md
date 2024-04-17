# API CRUD Base

### Setup Steps

##### 1. Install the package

`composer require yatilabs/api`

##### 2. Usage Example

```
<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\YourModel;
use Yatilabs\Api\BaseApi;

class YourModelController extends Controller
{
    protected $baseApi;

    public function __construct()
    {
        $this->baseApi = new BaseApi(YourModel::class);
    }

    public function index()
    {
        return $this->baseApi->index();
    }

    public function show($id)
    {
        return $this->baseApi->show($id);
    }

    public function store(Request $request)
    {
        return $this->baseApi->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->baseApi->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->baseApi->destroy($id);
    }
}

```
