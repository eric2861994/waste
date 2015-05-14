import os

def getFileNames(directory):
	filenames = []
	nodes = os.listdir(directory)
	for node in nodes:
		if os.path.isdir(directory + os.sep + node):
			continue
		filenames.append(node)
	return filenames

def main():
	files = getFileNames(os.curdir)
	phpFiles = filter(lambda x: '.php' in x, files)
	
	myDate = '2015_05_14_'
	sequence = 0
	for migration in phpFiles:
		mySequence = '%06d'%sequence
		namePart = migration[18:]
		myPart = myDate + mySequence + '_' + namePart
		os.rename(migration, myPart)
		sequence += 1

if __name__ == '__main__':
	main()