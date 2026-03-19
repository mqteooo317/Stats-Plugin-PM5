# Stats-Plugin-PM5

[![GitHub](https://img.shields.io/badge/GitHub-Profile-181717?style=for-the-badge&logo=github)](https://github.com/mqteooo317)
[![Discord](https://img.shields.io/badge/Discord-User-5865F2?style=for-the-badge&logo=discord)](https://discord.com/users/1279870617197482055)
[![Repository](https://img.shields.io/badge/Repository-Source-0052FF?style=for-the-badge&logo=git)](https://github.com/mqteooo317/Stats-Plugin-PM5)
[![Dashboard](https://img.shields.io/badge/System-Dashboard-FF4500?style=for-the-badge&logo=googlechrome)](https://github.com/mqteooo317/Stats-Dashboard)

## Purpose
A specialized performance-tracking plugin for PocketMine-MP v5. It logs player kills and deaths locally and synchronizes the data with a centralized API.

## Core Features
* Local persistence via JSON.
* Asynchronous data synchronization to prevent main-thread congestion.
* Native PM5 event handling for accurate statistics.

## Dependencies
**Mandatory Requirement:** This plugin is designed to operate in conjunction with the [Player Statistics API & Dashboard System](https://github.com/mqteooo317/Stats-Dashboard). It will not function as a standalone leaderboard without the backend component.

## Configuration
Define your API endpoint and security key in `config.yml`:
* `api_url`: Your backend endpoint.
* `api_key`: The `x-api-key` value for authentication.
* `sync_interval`: Frequency (in seconds) for remote updates.

## Credits
* **Lead Developer:** mateocollar (mqteooo317)

## License
Licensed under the MIT License.
