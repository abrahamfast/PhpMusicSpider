# PhpMusicSpider
Music Spider is a command line crawler



## get list of command

```sh
php cli
```

## run a spider

```sh
php cli spider:run providerName providerType providerLink
```

## make new spider

```sh
php cli spider:make Provider
```

## queue work

```sh
php cli queue:work
```

## queue list

```sh
php cli queue:list
```


## Core Skeleton Tasks
- [X] dom detector
- [X] dom verify
- [ ] dom downloader
- [X] database model
- [ ] api model
- [ ] trigger
- [ ] exception trigger
- [X] queue manager
