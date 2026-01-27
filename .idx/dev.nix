{pkgs}: {
  channel = "stable-24.05";
  packages = [
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.nodejs_20
    pkgs.sqlite
  ];
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
  ];
  idx.workspace.onCreate = {
    # Install PHP and JS dependencies on workspace creation
    composer-install = "composer install";
    npm-install = "npm install";
    # Create the SQLite database file if it doesn't exist
    setup-db = "touch database/database.sqlite";
  };
  idx.previews = {
    previews = {
      web = {
        command = [
          "php"
          "artisan"
          "serve"
          "--port"
          "$PORT"
          "--host"
          "0.0.0.0"
        ];
        manager = "web";
      };
    };
  };
}
