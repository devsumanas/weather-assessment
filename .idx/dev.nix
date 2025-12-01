{pkgs}: {
  channel = "stable-24.05";
  packages = [
    pkgs.php82 # Or your desired PHP version like pkgs.php83
    pkgs.php82Packages.composer
    pkgs.nodejs_20 # Or your desired Node.js version
    pkgs.sqlite
  ];
  idx.extensions = [
    "svelte.svelte-vscode"
    "vue.volar"
  ];
  idx.workspace.onCreate = {
    npm-install = "npm install";
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