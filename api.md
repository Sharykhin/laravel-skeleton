Api description:
================

JSON is in use for all the responses

Provider Authentication:
------------------------
Login as a provider

```bash
POST /api/providers/login
```
JSON-in:
```json
{
  "email":"somemail@mail.com",
  "password":"111111"
}
```

JSON-out:
```json
{
  "success": true,
  "data": {
    "token": "token",
    "provider": {
      "id": 2,
      "email": "foo@test.com",
      "shop_name": "foo",
      "location1": "Foo street 14",
      "location2": null,
      "phone_number": null,
      "proprietors_name": null,
      "main_reception_contact": null,
      "profile_photo_url": null,
      "is_active": 0,
      "deleted_at": null,
      "created_at": null,
      "updated_at": null
    }
  },
  "meta": null
}
```

**token** - JWT token 

Consumer Authentication:
-----------------------

Login as a consumer

```bash
POST /api/consumers/login
```

JSON-in:
```json
{
  "email":"somemail@mail.com",
  "password":"111111"
}
```

JSON-out:
```json
{
  "success": true,
  "data": {
    "token": "token",
    "consumer": {
      "id": 1,
      "email": "foo@test.com",
      "first_name": "foo",
      "last_name": null,
      "phone_number": null,
      "is_active": 1,
      "deleted_at": null,
      "created_at": null,
      "updated_at": null
    }
  },
  "meta": null
}
```

**token** - JWT token 