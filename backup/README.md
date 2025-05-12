# backup project

### To access it go to

```bash
http://localhost/ITP222-finalproj/backup/finalproj_bckp/public/
```

<pre>

/back-end/ 
│
├── public/                   → Publicly accessible files (entry point)
│   └── index.php             → Main entry file (front controller)
│
├── app/                      → Core application logic
│   ├── controllers/          → Handles requests and calls models/views
│   │   └── homeController.php
│   ├── models/               → Business logic and database interaction
│   │    └── user.php
│   ├── views/                → HTML templates or JSON output
│   │    └── init.php
│   ├── core/                 → Core classes like Router, Request, etc.
│   │    └── router.php
│   └── config/               → Configuration files (e.g. database)
│        └── config.php
│
├── vendor/                   → For third-party packages (if using Composer)
│
└── .htaccess                 → Rewrite all requests to /public/index.ph

</pre>