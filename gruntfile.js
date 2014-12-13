'use strict';
module.exports = function(grunt) {
    // display the elapsed execution time of grunt tasks
    require('time-grunt')(grunt);
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            files: ['sass/**/*.{scss,sass}', 'style.css', 'js/*.js', '**/*.php'],
            tasks: ['sass', 'jshint', 'autoprefixer', 'browserSync'],
            options: {
                livereload: true,
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    outputStyle: 'compress',
                    lineNumbers: true,
                    includePaths: require('node-neat').includePaths
                },
                files: {
                    'style.css': 'sass/style.scss'
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4'],
                map: true
            },
            files: {
                expand: true,
                flatten: true,
                src: '*.css',
                dest: ''
            },
        },
        // runs across multiple devices (runs concurrently with watch task)
        browserSync: {
            dev: {
                bsFiles: {
                    src : ['style.css', '*.php']
                },
                options: {
                    proxy: "rest-site.dev",
                    watchTask : true // < VERY important
                }
            }
        },
        // jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true,
                reporter: require('jshint-stylish')
            },
            all: [
                'Gruntfile.js',
                'js/*.js'
            ]
        },
        // uglify
        uglify: {
            main: {
                options: {
                    sourceMap: 'js/scripts.js.map',
                    sourceMappingURL: 'scripts.js.map',
                    sourceMapPrefix: 2
                },
                files: {
                    'js/scripts.min.js': [
                        'js/scripts.js'
                    ]
                }
            }
        },
        // concurrent
        concurrent: {
            target: {
                tasks: ['autoprefixer', 'jshint', 'sass', 'uglify']
            }
        }
    });

    // register task
    grunt.registerTask('default', ['concurrent:target', 'browserSync', 'watch' ]);
    grunt.registerTask('dev', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'watch']);
};
