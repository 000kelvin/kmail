def task(data_file):
    with open(data_file) as action:
        data = action.read()

        answer = open('ans_1_1.txt')
        answer = answer.read()
        if answer in data:
            print 'Correct answer, your answer is: ' + data + '\n'
            print 'The correct answer is: ' + answer
            # return True

        else:
            print 'Incorrect answer'
            print 'The correct answer is: ' + answer + '\n'
            # return False

        action.close()

task('task.sql')
