
# Filterable

A package for laravel that are designed to help you filter your model using request queries.


## Installation

Use [composer](https://getcomposer.org/) dependency manager to install ``filterable``

```composer require dwikipeddos/filterable```
## Usage Example

First in your model you need to use `dwikipeddos/filterable` trait, this will add a scope for filtering to your model

```
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Filterable;
}
```

Next you need to create a class for filtering for each of your filterable model and extends `FilterBase`, you can place this class anywhere you want.
for example, we place it in `app/filters`

```
class UserFilter extends FilterBase{

    //pay attention to the function name, because the function name = the request query
    public function name(string $name) : Builder {
        //then all you need to do is filter the builder inside this function;
        return $this->builder->name("name","LIKE","%$name%");
    }
}
```

Finally to filter out your query all you need to do is call filter in your model!

```
public function index(UserFilter $filter){
    return User::filter($filter)->get();
}
```

that's it, now the package will filter out all the query you need.
## License

[MIT](https://choosealicense.com/licenses/mit/)

