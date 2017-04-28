Style guides:
------------

1.**Interfacing naming convention:**

  use prefix I before name: 
  
  ```php
  <?php
  
  interface IRole {}
  ```
  
  ```php
  <?php
  
  interface IRoleManager {}
  ```
  
2. **Interface files**

  Put files under the directory *app/Interfaces*.
  
  
3. **Service Providers**

  When bind interfaces of other services use abosule namespace path, don't include it
  into *use* since it's easier to change the specific implementation:
  ```php
  $this->app->bind(\App\Interfaces\Services\IRoleManager::class, \App\Services\RoleManager::class);
  ```
 