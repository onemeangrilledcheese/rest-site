'use strict';
module.exports = function(grunt) {
    // display the elapsed execution time of grunt tasks
    require('time-grunt')(grunt);
    // load all grunt tasks matching the `grunt-*` pattern
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            options: {
                livereload: true,
            },
            sass: {
                files: ['sass/**/*.{scss,sass}'],
                tasks: ['sass']
            },
            css: {
                files: ['style.css'],
                tasks: []
              },
            js: {
                files: 'js/*.js',
                tasks: ['jshint', 'uglify']
            }
        },

        // sass
        sass: {
            dist: {
                options: {
                    style: 'expanded',
                    lineNumbers: true,
                    includePaths: require('node-neat').includePaths
                },
                files: {
                    'style.css': 'sass/style.scss',
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
            target1: {
                tasks: ['sass', 'jshint']
            },
            target2: {
                tasks: ['autoprefixer']
            },
            target3: {
                tasks: ['watch'],
                options: {
                    logConcurrentOutput: true
                }
            }
        }
    });

    // register task
    grunt.registerTask('default', ['concurrent:target1', 'concurrent:target2', 'concurrent:target3' ]);
    grunt.registerTask('dev', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'watch']);
};
