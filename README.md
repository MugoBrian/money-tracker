php artisan serve

```

Your API is live at `http://127.0.0.1:8000`

---

#### 1. Create a User
```

POST http://127.0.0.1:8000/api/users
Content-Type: application/json

{
"name": "Jane Doe",
"email": "jane@example.com"
}

```

#### 2. Create a Wallet
```

POST http://127.0.0.1:8000/api/users/1/wallets
Content-Type: application/json

{
"name": "Business A",
"currency": "USD"
}

```

#### 3. Add an Income Transaction
```

POST http://127.0.0.1:8000/api/wallets/1/transactions
Content-Type: application/json

{
"type": "income",
"amount": 5000,
"description": "Client payment"
}

```

#### 4. Add an Expense Transaction
```

POST http://127.0.0.1:8000/api/wallets/1/transactions
Content-Type: application/json

{
"type": "expense",
"amount": 1200,
"description": "Office supplies"
}

```

#### 5. View User Profile (wallets + balances + total)
```

GET http://127.0.0.1:8000/api/users/1
